sudo chmod 777 ./undisclosed-web/data
mv ./undisclosed-web/rename_this_to_dot_git_on_deployment ./undisclosed-web/.git
sudo docker-compose up -d --build