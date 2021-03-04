USE Ecomm_project;
SELECT * FROM bookinventory;
SELECT * FROM bookinventoryorder;
INSERT INTO bookinventory(img,bookname,quantity) 
VALUES ("images/card1.jpg","Clean Code",23), 
("images/card2.jpg","Intro to Algorithms",20), 
("images/card3.jpg","Structure and Interpretation of Computer Programs",18), 
("images/card4.jpg","Refactoring: Improving the Design of Existing Code",27), 
("images/card5.jpg","Code Complete: A Practical Handbook",5), 
("images/card6.jpg","Design Patterns",6), 
("images/card7.jpg","The Pragmatic Programmer",9);
