async function main() {
  const Factory = await ethers.getContractFactory("SimpleStorage");
  const contract = await Factory.deploy();

  await contract.waitForDeployment();

  console.log("Deployed to:", await contract.getAddress());

  // 動作確認
  await contract.set(42);
  console.log("Stored value:", await contract.get());
}

main().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});