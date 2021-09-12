# library_mngmnt_teamstorm
Principles of Database Systems - CS5423- Assignment
CS5423: Building a Database-driven Web-based Information System 

We are building an application for library management, where users (students and admin) can login and search for the products (books, laptops, CDs, etc.) information they have checked out from the library. Users can be able to update and delete the product records using the interface. 

We have used Microsoft SQL Server Management Studio for creating the DB, html for index (home) page and php for the other pages. These will be used for connecting to dB, to show listings, update database, delete records. 

Database Details:

The ER diagram for our database is shown below. We have 5 entities and relations between them. 
 
We have created Users, UserHistory, Roles, ProductType and Product tables. All these tables have one to many relations between them. Below are the tables which have the one-to-many relation between them. 

Roles and User Tables  

User and UserHistory 

Product Type and PRoduct 

Product and UserHistory 

User and UserHistory 

Below are the queries we used for creating the DB and tables. 


Functionality Details 

We have used the following queries to insert the test data into the tables. 

We have used the following search queries to get the desired results. 

Queries to get all the records from the tables 

Query to get product type and product names that user checked in 

Query to get the user information with the role as Admin 
 
Queries with aggregate  functions 

Query to get the list of products that were due yesterday (In this query we used joins and Getdate() function) 
 
Query to get the count of product types that are checkedin by any users 
 
Query to get the total late fee of each user 
 
Queries to update the records and alter the table 
 
Queries to delete the records - we deleted the records in userhistory table of the products which are checkedin 
 

Implementation Details 

We have used php and html to design our web interface for Library management application. The main features of our application are 

Register a new user to the database 

Students can search for other users based on department as well as search for a full listing of products based on type. 

Students can add, update and delete the user history records 

There is a screen for product listing to search the product by product-type and a feature to search the users by department 

Registration Screen: 

	In this screen the user can register information into the application, when the user registers, a new record is added into the Users tables by Insert query. Below is the screenshot of the screen 
 

Search Database Screen: 

	In this screen, you can search for other users based on department and search for a full list of products based on type. 


Student History Screen: 

	In this screen, student can be able to view his own records of checked out products. Students can add new records of checked-in products. When users add a new record a insert query is called and insert a record into UserHistory table. When a student updates a record, an update query is called to update the record in UserHistory table. When the user deletes a record, a delete query is called to delete the record in UserHistory table. 

	We have used the query below to populate the user records of UserHistory table and below is the screenshot for the screen. 


Product Listing Screen: 

In this screen, we have used select statements to populate the products by product type and users by department. There are no queries to modify the data in the database on this screen. Below is the screenshot. 

 

GitHub link: 

We have uploaded our project files in the link below. 
https://github.com/deepthimneni/library_mngmnt_teamstorm.git
 
References 

https://www.geeksforgeeks.org/how-to-insert-form-data-into-database-using-php/ 

https://stackoverflow.com/ 

https://docs.microsoft.com/en-us/sql/relational-databases/performance/joins?view=sql-server-ver15 

https://www.w3schools.com/sql/default.asp 

