#Application was made for dudes from Upwork

-----

##Usage:

###Environment settings stored in .env file

-----

###Application will be available at localhost:80

-----

###Start:
```text
$ docker-compose up -d --build
```

###Stop:
```text
$ docker-compose down
```
-----

###Connect to container:
```text
# The first: get container ID
$ docker ps -a
CONTAINER ID        IMAGE                                    COMMAND                  CREATED             STATUS                          PORTS               NAMES
90f2766d0298        testwpwoocomapplication_docker_adminer   "entrypoint.sh docke…"   45 seconds ago      Up 54 seconds                   9000/tcp            testwpwoocomapplication_docker_adminer_1
....

# The second: connect
$ docker exec -it /bin/sh <container_id>
```

-----

###Logs stored at `./docker/data/logs`

-----

###Database stored at `./docker/data/db/mysql/data`

-----

###Adminer accessible at `localhost/adminer`
```text
Server: docker_mysql
Username: root / user
Password: 1234 / 123
# From .env file
```

-----
