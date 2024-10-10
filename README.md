# groundwork


## Installation
 1. Install `docker` and `docker-compose` https://docs.docker.com/compose/install/
 2. Clone this repository
    ```
    git clone git@github.com:projco-new/groundwork.git
    ```
 3. In the project directory build and start containers
     ```
     cd groundwork 
     docker-compose up -d --build
     ```
    
 4. Add the following in your hostfile `/etc/hosts`
    ```
    127.0.0.1 checkout.local
    ```
 5. Install dependencies
    ```
    docker exec -it --user application co_app composer install
    ```
 6. Verify that the application works http://checkout.local

## Helpful Commands
### SSH into app container
```
docker exec -it --user application co_app bash
```
### Flush Redis Cache
```
docker exec co_redis redis-cli FLUSHALL
```
### Consume messages (Running Worked)
```
docker exec -it co_app php bin/console messenger:consume async
```
