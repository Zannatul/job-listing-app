FROM node:18

WORKDIR /app

# Copy only files needed to install dependencies
COPY package*.json webpack.mix.js ./
RUN npm install

# Copy all Laravel files (to detect Vue changes)
COPY . .

CMD ["npm", "run", "dev"]
