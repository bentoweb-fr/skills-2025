FROM node:18-alpine

WORKDIR /var/www/front

COPY package.json package-lock.json ./

RUN npm install

# Copy the entire project
COPY . .

# Keep the container running for potential npm commands
CMD ["tail", "-f", "/dev/null"]
