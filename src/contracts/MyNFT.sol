// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

import "@openzeppelin/contracts/token/ERC721/extensions/ERC721URIStorage.sol";

contract MyNFT is ERC721URIStorage {
    uint256 public nextTokenId = 123;
    address public owner;

    constructor() ERC721("MyNFT", "MNFT") {
        owner = msg.sender;
    }

    function mint(address to, string memory uri) public {
        uint256 tokenId = nextTokenId;
        _safeMint(to, tokenId);
        _setTokenURI(tokenId, uri);
        nextTokenId++;
    }
}