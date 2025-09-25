#!/usr/bin/env bash
# Enables Xdebug for a single command so CLI tools can be debugged on demand.
set -euo pipefail

if [ $# -eq 0 ]; then
  echo "Usage: xdebug-on <command> [args...]" >&2
  exit 1
fi

MODE="${XDEBUG_MODE_OVERRIDE:-debug,develop}"
HOST="${XDEBUG_CLIENT_HOST:-host.docker.internal}"
PORT="${XDEBUG_CLIENT_PORT:-9003}"

echo "Running with Xdebug mode '${MODE}' (client ${HOST}:${PORT})" >&2
XDEBUG_MODE="${MODE}" XDEBUG_TRIGGER=1 XDEBUG_CONFIG="client_host=${HOST} client_port=${PORT}" "$@"
