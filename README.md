## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

-------------------------------------------------------------------------------------------
**Documentation**

Install aws cli - on ubuntu
aws configure
Take secret key and secret key 

git clone </url>

Repository-
git clone https://github.com/divya123varikuti/Laravel-application
cd Laravel-application
ls

Install Laravel in the Repository
Install Composer:
Laravel requires Composer, a PHP dependency manager, to manage its libraries.

download composer with php

sudo apt install php --> php installation
sudo apt install curl unzip -y --> downloading composer
curl -sS https://getcomposer.org/installer | php -->download the composer installer
sudo mv composer.phar /usr/local/bin/composer --> move the composer to global directory
composer --version

if any error then do 
ls -a 
rm -rf *
rm -rf .*
and install it

composer create-project --prefer-dist laravel/laravel Laravel

nano routes/web.php

Updates the routes file with below functionality
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return 'Welcome to the Dashboard!';
});

git init
git status
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/your-username/your-repository.git
git remote -v
git push -u origin main

https://github.com/divya123varikuti/laravel-application

sudo apt install nginx -y
Configure Nginx for Laravel:
sudo nano /etc/nginx/sites-available/Laravel

add ipv4 address (from ec2) in configuration file
 
http://<ipv4_address>/ -- output you will see web page there 

--------------------------------------------------------------------------

CICD Pipeline Setup

Install Jenkins on ubuntu server

sudo apt install openjdk-11-jdk -y
sudo apt install jenkins -y
from AV

configure inbound rules allow traffic 8080

http://<ipv4_address>:8080/

sudo <path> -- retrieve the password

Jenkins username: admin
password: <retrived_one> - If you skip admin user creation in that case one can use this credentials

install plugins git,docker,ks - In Managed Jenkins--> Available Plugins

click new item--> pipeline

add credentials
username 
password 
id
desc

https://github.com/divya123varikuti/laravel-application
----------------------------------------------------------------------------------------------------------------------------------
Docker
-- Dockerfile --> Placed in repo

docker build -t laravel-app .
docker run -d -p 80:80 --name laravel-container laravel-app
docker ps

http://your-server-ip -- output one can see

docker login

---------------------------------------------------------------------------------------------------------------------------------
Infrastructure As Code

mkdir terraform && cd terraform

Place main.tf, varibles.tf and outputs.tf here..

terraform init
terraform validate
terraform apply

Configure kubectl to Access the EKS Cluster -->Install kubectl
aws eks --region us-west-2 update-kubeconfig --name laravel-eks  -->access to eks
kubectl get nodes -->test the cluster

--------------------------------------------------------------------------------------------------
Deployment to Kubernetes on AWS EKS

Place secrets,deployments,service.yaml files in path

Then do

kubectl apply -f laravel-config.yaml
kubectl apply -f laravel-secrets.yaml

kubectl apply -f laravel-deployment.yaml
kubectl apply -f laravel-service.yaml

kubectl get pods
kubectl get svc

The service should show an external IP for the LoadBalance

kubectl get svc laravel-service --> get the load balancer ip

http://<external_ip>

--------------------------------------------------------------------------------------
Ansible

ansible-playbook post_provisioning.yml

Access Grafana at the LoadBalancer URL on port 3000.
Access Prometheus at the LoadBalancer URL on port 9090.

-->Make sure to configure the above port numbers in AWS inbound rules to allow traffic

aws eks --region <region> update-kubeconfig --name <eks-cluster-name>

aws eks --region us-west-2 update-kubeconfig --name laravel-eks-cluster

kubectl get service laravel-service

NAME              TYPE           CLUSTER-IP      EXTERNAL-IP       PORT(S)        AGE
laravel-service   LoadBalancer   10.100.200.1    203.0.113.25      80:30123/TCP   5m

http://external-ip  -- Access the application using the EXTERNAL-IP in your browser.

-------------------------------------------------------------------------------------------------------------------------------------




