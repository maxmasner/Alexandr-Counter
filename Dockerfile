FROM php:8.3-alpine

WORKDIR /var/www

COPY src/ /var/www/

# Default persistent location can be overridden with COUNTER_FILE env.
ENV COUNTER_FILE=/data/counter.json

RUN mkdir -p /data \
    && touch /data/counter.json \
    && chown -R www-data:www-data /data

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
  CMD wget -q -O /dev/null "http://127.0.0.1:80/index.php" || exit 1

CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www"]
