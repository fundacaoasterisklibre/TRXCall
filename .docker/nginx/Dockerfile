FROM nginx

RUN apt-get update

COPY nginx.conf /etc/nginx/nginx.conf
COPY trx-dev.conf /etc/nginx/sites-enabled/trx-dev.conf

CMD ["nginx", "-g", "daemon off;"]