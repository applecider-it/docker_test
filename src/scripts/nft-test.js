/** メインルーチン */
async function main() {
  const deployers = await ethers.getSigners();

  const contractAddress = await deploy();

  const contract = await ethers.getContractAt("MyNFT", contractAddress);

  await mintTest(contract, deployers[0], "https://example.com/metadata/0.json");
  await mintTest(contract, deployers[1], "https://example.com/metadata/1.json");
}

/** NFTをデプロイ */
const deploy = async () => {
  const Factory = await ethers.getContractFactory("MyNFT");

  const contract = await Factory.deploy();

  await contract.waitForDeployment();

  const address = await contract.getAddress();

  console.log("NFT deployed to:", address);

  return address;
};

/** トークン発行と検証 */
const mintTest = async (contract, deployer, argUri) => {
  console.log("deployer.address:", deployer.address);

  // NFT発行
  const tx = await contract.mint(deployer.address, argUri);

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
