import https from 'https';
import fs from 'fs';
import express from 'express';
import { createProxyMiddleware } from 'http-proxy-middleware';

const app = express();

// Đọc chứng chỉ SSL được tạo bởi mkcert
const sslOptions = {
    key: fs.readFileSync('storage/certs/127.0.0.1+2-key.pem'),
    cert: fs.readFileSync('storage/certs/127.0.0.1+2.pem')
};

// Proxy chuyển tiếp các request HTTPS đến Laravel server
app.use('/', createProxyMiddleware({
  target: 'http://127.0.0.1:8000', // Laravel chạy ở đây
  changeOrigin: true,
  secure: false, // Bỏ qua xác thực SSL nếu Laravel không có HTTPS
}));

// Tạo server HTTPS
https.createServer(sslOptions, app).listen(3000, () => {
  console.log('Node.js HTTPS proxy đang chạy tại: https://localhost:3000');
});
