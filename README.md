## NGINX
The NGINX folder contains the files necessary for creating the customized Docker image.

The docker image can be downloaded using `docker pull chynkm/nginx-ecs:latest`.

## PHP
The PHP folder contains a sample Laravel application which demonstrates the working of S3, Queue(using Redis cluster) and RDS.

Each backing services functionality can be verified by using the routes specified in the file `routes/web.php`.

The docker image can be downloaded using `docker pull chynkm/laravel-ecs:latest`.
