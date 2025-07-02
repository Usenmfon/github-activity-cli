# GitHub Activity CLI

A simple PHP command-line application that fetches and displays the recent public activity of a GitHub user using the GitHub Events API.

## 📌 Features

- Accepts a GitHub username as a CLI argument
- Fetches recent user activity from the GitHub API
- Displays a readable summary of actions:
  - Pushed commits
  - Opened issues
  - Starred repositories
  - Forked repositories
- Built without external libraries

## 📂 File Structure


github-activity-cli/
│
├── github-activity.php # Main CLI script
└── README.md # Project documentation


## 🚀 Usage

### 1. Clone the repository or download the script

```bash
git clone https://github.com/Usenmfon/github-activity-cli.git
cd github-activity-cli

# Using PHP directly
php github-activity.php <github-username>

# OR if executable (Unix)
./github-activity.php <github-username>


php github-activity.php Usenmfon

## 🧾 Example Output

CreateEvent in Usenmfon/task-cli-php
CreateEvent in Usenmfon/task-cli-php
Pushed 2 commit(s) to FutureLabss/futurelabs-studio
PullRequestEvent in FutureLabss/futurelabs-studio
CreateEvent in Usenmfon/finance-tracker-be
CreateEvent in Usenmfon/finance-tracker-be
