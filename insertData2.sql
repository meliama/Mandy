insert into sellers (location, description, services, category_id, user_id) 
values ('Palermo Holleywood', 'Seller 2 description.',
   true, 2, 2)

select * from images

insert into images (src, product_id) values ('img_product/3_a.JPG', 3);
insert into images (src, product_id) values ('img_product/3_b.JPG', 3);
insert into images (src, product_id) values ('img_product/4_a.JPG', 4);

select * from products

insert into products (name, price, stock, category_id, user_id, description) 
  select name, price, stock, category_id, 4, description from products 