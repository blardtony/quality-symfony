# Symfony analyze quality code

## Init

Build and start containers
`docker compose up --build`

## Sonarqube

### Config Sonarqube

Go on <http://localhost:9001>
Log in :

- Login: `admin`
- Password: `admin`

Click on Create Project (right corner) -> Local project

Complete the form

- Project display name : Test
- Project key : YOUR_PROJECT_KEY

Choose `Use the global setting`

Go on Projects

Select your project, here `Test`

Select `Locally` -> Generate Token `YOUR_TOKEN`

### Analyze code

Run tests with coverage
`XDEBUG_MODE=coverage vendor/bin/phpunit`

Sonarqube scan
`docker run --rm --network=host \
  -e SONAR_HOST_URL="http://localhost:9001" \
  -e SONAR_SCANNER_OPTS="-Dsonar.projectKey=YOUR_PROJECT_KEY" \
  -e SONAR_TOKEN="YOUR_TOKEN" \
  -v "$(pwd):/usr/src" \
  sonarsource/sonar-scanner-cli`
