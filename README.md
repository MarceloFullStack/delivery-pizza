# Video aula de como montar ambiente docker para php e Laravel
COMANDOS:


1-entrar no container php:
	docker exec -it php bash

2-dar permissão à pasta storage:
	chown -R www-data:www-data storage
3-subir containers:
	docker-compose up -d
4-derrubar containers:
	docker-compose down

5-To clear containers
	docker rm -f $(docker ps -a -q)

6-To clear images:

	docker rmi -f $(docker images -a -q)

7-To clear volumes:

	docker volume rm $(docker volume ls -q)

8-To clear networks:

	docker network rm $(docker network ls | tail -n+2 | awk '{if($2 !~ /bridge|none|host/){ print $1 }}')
