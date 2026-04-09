/** メインルーチン */
async function main() {
  const users = await ethers.getSigners();
  const line = "----------------------------------------------------------------";

  console.log("users.length", users.length);
  let cnt = 0;
  for (const user of users) {
    console.log("user.address", user.address);
    cnt++;
    if (cnt >= 4) break;
  }

  console.log(line)

  const contractAddress = await deploy(users[3]);

  console.log(line)

  const contract = await ethers.getContractAt("MyNFT", contractAddress);

  await mintTest(contract, users[1], "https://example.com/metadata/0.json");

  console.log(line)

  await mintTest(contract, users[2], "https://example.com/metadata/1.json");
}

/** NFTをデプロイ */
const deploy = async (user) => {
  console.log("## deploy ##");

  const Factory = await ethers.getContractFactory("MyNFT", user);

  const contract = await Factory.deploy();

  await contract.waitForDeployment();

  const address = await contract.getAddress();

  console.log("NFT deployed to:", address);

  const owner = await contract.owner();
  console.log("Contract Owner:", owner);

  return address;
};

/** トークン発行と検証 */
const mintTest = async (contract, user, argUri) => {
  console.log("## mintTest ##");

  console.log("user.address:", user.address);

  // NFT発行
  const tx = await contract.mint(user.address, argUri);

  const receipt = await tx.wait();

  // Transferイベントを探す
  const event = receipt.logs.find((log) => {
    try {
      return contract.interface.parseLog(log).name === "Transfer";
    } catch {
      return false;
    }
  });

  const parsed = contract.interface.parseLog(event);

  const tokenId = parsed.args.tokenId;

  console.log("Token ID:", tokenId.toString());

  // 所有者確認
  const owner = await contract.ownerOf(tokenId);
  console.log("Owner:", owner);

  // 内容確認
  const uri = await contract.tokenURI(tokenId);
  console.log("Metadata URI:", uri);
};

main().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
