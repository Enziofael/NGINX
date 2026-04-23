FROM nginx:latest

# утилиты
RUN apt-get update && apt-get install -y \
    openssl \
    apache2-utils \
    && rm -rf /var/lib/apt/lists/*

# SSL сертификаты
RUN mkdir -p /etc/nginx/ssl && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/nginx/ssl/nginx.key \
    -out /etc/nginx/ssl/nginx.crt \
    -subj "/C=RU/ST=Moscow/L=Moscow/O=Local/CN=drug.ru"


# Создание .htpasswd (admin/password)
RUN htpasswd -bc /etc/nginx/.htpasswd admin pwd

# Копирование конфига Nginx
COPY ./nginx-config/drug.ru.conf /etc/nginx/conf.d/default.conf

# Копирование файлов сайта
COPY ./site/ /var/www/drug.ru/

EXPOSE 80 443 8084 8081