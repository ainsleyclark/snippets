# Conditionally Serve webp Images via Nginx

--- 

## Install Brew
On the server, ensure that brew installed.

[https://docs.brew.sh/Homebrew-on-Linux](https://docs.brew.sh/Homebrew-on-Linux)

## Install cwebp
Then in install google cwebp, site can be found at [https://developers.google.com/speed/webp/docs/cwebp](https://developers.google.com/speed/webp/docs/cwebp)

```
brew install webp
```

## Convert Images
Copy ```convert-webp.sh``` to the directory you want conver the webp images too (for example: /wp-content/uploads).
Open terminal, cd to the directory and run ```sh convert-webp.sh```. If done correctly, all images within that directory (recursive) will be converted to teh extension image.png.webp.
You are able to adjust the quality of the webp images by adjusting the quality paramter in the sh script ```cwebp -q 80`` (0-100).

## Configure nginx

1. Create the file ```/etc/nginx/conf.d/webp.conf``` and paste the following contents into it, save.

```
## Chrome/65 accept : image/webp,image/apng,image/*,*/*;q=0.8
## Firefox/58 accept: */*
## iPhone5s   accept: */*
map $http_accept $img_suffix {
  "~*webp"  ".webp";
  "~*jxr"   ".jxr";
}
## https://github.com/cdowdy/Nginx-Content-Negotiation/blob/master/nginx.conf
map $msie $cache_control {
  "1"     "private";
}
map $msie $vary_header {
  default "Accept";
  "1"     "";
```

2. Ensure that the default nginx config file is include the webp.conf you have just created. ```nano /etc/nginx/nginx.conf```. Under the http directive there should be something similar too ```include /etc/nginx/conf.d/*.conf;```

3. Add the following to your config file under sites-available.

```
location ~* \.(?:jpg|jpeg|gif|png|ico|cur|webp|jxr)$ {
  expires 1M;
  add_header Vary $vary_header;
  add_header Cache-Control $cache_control;
  add_header Cache-Control "public";
  ## Comment to enable the access-accept.log scraper:
  access_log off;
  try_files $uri$img_suffix $uri =404;
}
```

4. Reload & nginx ```sudo nginx -t && sudo service nginx reload```.

## Test

- Run with native curl user agent
curl -I -L https://www.your-blog.com/wp-content/uploads/2018/02/image.png

- Run with Webp accept header.
curl -I -L -H "accept:image/webp,image/apng,image/*,*/*;q=0.8" https://www.your-blog.com/wp-content/uploads/2018/02/image.png

See [https://www.it-cooking.com/technology/web/nginx/conditionally-serving-webp-images-with-nginx/](https://www.it-cooking.com/technology/web/nginx/conditionally-serving-webp-images-with-nginx/) for more details.
