#!/usr/bin/python3

import http.server
import socketserver
import subprocess
import base64
import json
import pwd
import grp

# Variables
USERNAME = "test"
PASSWORD = "abcABC123"
PORT = 3000

class postHandler(http.server.SimpleHTTPRequestHandler):
    def do_POST(self):
        auth_header = self.headers.get('Authorization')
        valid_creds = base64.b64encode(f"{USERNAME}:{PASSWORD}".encode()).decode()
        
        if auth_header != f"Basic {valid_creds}":
            self.send_response(401)
            self.send_header('WWW-Authenticate', 'Basic realm="System Info"')
            self.end_headers()
            self.wfile.write(b"Incorrect login information.")
            return

        response_data = {}

        if self.path == '/api/users':
            response_data = {str(u.pw_uid): u.pw_name for u in pwd.getpwall()}

        elif self.path == '/api/groups':
            response_data = {str(g.gr_gid): g.gr_name for g in grp.getgrall()}

        else:
            self.send_response(404)
            self.end_headers()
            return

        self.send_response(200)
        self.send_header('Content-type', 'application/json')
        self.end_headers()
        self.wfile.write(json.dumps(response_data).encode('utf-8'))


with socketserver.TCPServer(("", PORT), postHandler) as httpd:
    print(f"Serving at port {PORT}")
    # Added this because I don't like it giving me an error when server closes
    try:
        httpd.serve_forever()
    except KeyboardInterrupt:
        pass
    httpd.server_close()