FROM node:18-alpine

# Set working directory
WORKDIR /app

# Copy package files and install deps
COPY /frontend/package*.json ./
RUN npm install

# Copy the rest of the frontend code
COPY /frontend .

# Expose Vite port
EXPOSE 5173

# Run Vite dev server
CMD ["npm", "run", "dev"]