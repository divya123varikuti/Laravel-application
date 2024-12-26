# Builder Stage
FROM composer:latest as builder
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run production

# Final Stage
FROM php:8.1-fpm
COPY --from=builder /app /var/www
WORKDIR /var/www
RUN apt-get update && apt-get install -y nginx
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
