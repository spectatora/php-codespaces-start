# PHP & GitHub Codespaces Starter

Start coding PHP in minutes — no local setup required.

## Quick Start (Codespaces)

1. Click **Use this template → Create a new repository** in GitHub.
2. Open your repo and click **Code → Create codespace on main**.
3. When it boots, run:
   ```bash
   composer install || true
   composer test
   composer run serve
   ```
4. Codespaces will auto-forward **port 8000**. Open it in the browser.

### Try the demo endpoint

- Home page: `/` outputs a greeting + PHP version.
- Simple API: `/index.php?a=2&b=3` returns JSON `{ "sum": 5 }`.

## Project Layout

```
/.devcontainer/         # Codespaces/Devcontainer config
/.vscode/               # Editor settings & Xdebug launch
/.github/workflows/     # CI pipeline (PHPUnit)
/public/                # Web root (served by PHP built-in server)
/src/                   # App code
/tests/                 # PHPUnit tests
composer.json
phpunit.xml
README.md
```

## Debugging (Xdebug)

- A launch config is included: **Run and Debug → Listen for Xdebug** (port `9003`).
- Set a breakpoint in `public/index.php`, refresh the page.

## Local (Dev Containers)

If not using Codespaces, install **VS Code**, **Docker**, and open the folder in a **Dev Container**.
