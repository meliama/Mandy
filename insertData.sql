-- some sample data

insert into users (name, surname, username, email, password, question, answer)
   values ('meli', 'ama', 'meliama', 'meliama95@hotmail.com', '$10$rxiH0RkUnzd0JHFzJ6nhdu19AGq2bgX9FaMraQ8COyg8/IdeT79fe', 'q6', 'dormir');
insert into users (name, surname, username, email, password, question, answer)
   values ('Dani', 'Tapia', 'daniellatapia2', 'daniellatapias@gmail.com', '$10$A94eTWhledH3c0rH2zdsx.l84BAIZN5t.W9XnENOeZjquvIK2gXUC', 'q2', 'Leo');
 insert into users (name, surname, username, email, password, question, answer)
   values ('Paulina', 'Rubio', 'prubio', 'p@rubio.com', '$10$HG0.xDNBgrJoKyxdInJEKecbqYSFo.ZEpxuwFsPhkPdS3W4IJKmoK', 'q1', 'None');
    

insert into categories(name) values ('Wall Art');
insert into categories(name) values ('Decor');
insert into categories(name) values ('Clothing');


insert into sellers (location, description, services, category_id, user_id) 
values ('Palermo Soho', 'Born in the countryside, I have a special eye for what looks good.' , 1, 2, 1);
insert into sellers (location, description, services, category_id, user_id) 
values ('Palermo Holleywood', 'lorem ipsum ' , 1, 2, 2);


INSERT INTO products (name, `description`, `price`, `stock`, `category_id`, `user_id`, slug) VALUES ('Eiffel Tower', 'rendered in bronze', '30.99', '3', '2', '2', 'eiffel-tower-1');
INSERT INTO products (name, `description`, `price`, `stock`, `category_id`, `user_id`, slug) VALUES ('Evita', 'rendered in plaster', '40.99', '3', '2', '2', 'evita-2')
select * from users;
select * from categories;
select * from sellers;
select * from products;