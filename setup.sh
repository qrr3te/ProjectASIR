#!/bin/bash
# Debug 
#./setup/target/debug/setup
# Release
./setup/target/release/setup
pkill server_stats &>/dev/null
./server_stats/target/release/server_stats & disown
echo "Server stats: Socket listo para recibir conexiones en 172.20.0.1:14500"
