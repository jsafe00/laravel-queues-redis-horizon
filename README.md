<a href="https://www.buymeacoffee.com/jsafe00" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-black.png" alt="Buy Me A Coffee" style="height: 51px !important;width: 217px !important;" ></a>

# Setup Laravel 8 Queues using Redis and Horizon

### I used docker-template from https://github.com/ahmedash95/laravel-docker-template with few changes in Dockerfile since I'm using Laravel 8 and php 8. 

### To execute:

### In the root folder:

```
docker-compose up -d
```

### Execute Migration

```
docker-compose exec -it {container_name} bash
```

```
php artisan migrate:refresh --seed
```

### Run Horizon

```
php artisan horizon
```

Execute project in the browser:

```
localhost:8080/users/export
```
### TODO

- [ ] Tutorial
