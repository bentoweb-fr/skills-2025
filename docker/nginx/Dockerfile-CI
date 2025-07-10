FROM nginx:stable
# COPY nginx/nginx.conf /etc/nginx/conf.d/
# RUN echo "upstream php-upstream { server fpm:9000; }" > /etc/nginx/conf.d/upstream.conf
# RUN usermod -u 1000 www-data
# COPY /etc/nginx/fastcgi_params /etc/nginx/fastcgi_params
CMD ["php-fpm", "-R"]
