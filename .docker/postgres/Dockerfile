FROM postgis/postgis:12-3.2-alpine
RUN apk add --no-cache shadow curl && usermod -u 1000 postgres && groupmod -g 1000 postgres

COPY ./init.sql /docker-entrypoint-initdb.d/
