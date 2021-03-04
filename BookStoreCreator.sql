CREATE DATABASE Ecomm_project;
USE Ecomm_project;

-- BookInventory Table -- 
CREATE TABLE BookInventory(
id INT PRIMARY KEY auto_increment,
img VARCHAR(100) NOT NULL,
bookname VARCHAR(100) NOT NULL,
quantity INT NOT NULL
);

-- BookInventoryOrder Table -- 
CREATE TABLE BookInventoryOrder(
orderid INT PRIMARY KEY auto_increment,
firstname VARCHAR(100) NOT NULL,
lastname VARCHAR(100) NOT NULL,
bookname VARCHAR(100) NOT NULL,
paymentoption VARCHAR(10) NOT NULL
);