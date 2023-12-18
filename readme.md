# Coffee CRM

## How to install (on server)
*****************

1. Please download this repo (Don't fork, otherwise other applicant might be able to track your test result)
1. Update the environment in /application/config/.env
```zsh
cp .env.example .env
```

2. Please install and use PGAdmin to make it easy to manage the database
3. Create new database (example: coffeedb)
4. Restore the database file using the _restore_ feature in PGAdmin3 (right click on the database name that just created)
5. Select the database file
6. Once the database has been successfully restored, you are ready to start development.
