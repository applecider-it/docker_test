// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract SimpleStorage {
    uint256 private data;

    function set(uint256 x) public {
        data = x + 10000;
    }

    function get() public view returns (uint256) {
        return data;
    }
}