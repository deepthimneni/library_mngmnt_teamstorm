INSERT INTO dbo.Roles (RoleID, RoleName)
VALUES (1, 'Student'),
(2, 'Admin')

INSERT INTO ProductType(ProductTypeID, ProductTypeNAme)
Values(1, 'Text Book'),
(2, 'Novels'),
(3, 'Study Room'),
(4, 'CD'),
(5, 'Laptops'),
(6, 'Printers'),
(7, 'Projectors'),
(8, 'Other')

Insert INTO Product(ProductID, ProductTypeID, ProductName)
Values(1, 1, 'Text Book 1'),
(2, 1, 'Text Book 2'),
(3, 1, 'Text Book 3'),
(4, 1, 'Text Book 4'),
(5, 1, 'Text Book 5'),
(6, 1, 'Text Book 6'),
(7, 1, 'Text Book 7'),
(8, 1, 'Text Book 8'),
(9, 2, 'Novel 1'),
(10, 2, 'Novel 2'),
(11, 2, 'Novel 3'),
(12, 2, 'Novel 4'),
(13, 2, 'Novel 5'),
(14, 2, 'Novel 6'),
(15, 2, 'Novel 1'),
(16, 3, 'Study Room 1'),
(17, 3, 'Study Room 2'),
(18, 3, 'Study Room 4'),
(19, 4, 'CD -1'),
(20, 4, 'CD-2'),
(21, 4, 'CD-3'),
(22, 4, 'CD-4'),
(23, 5, 'Laptop 1'),
(24, 5, 'Laptop 2'),
(25, 5, 'Laptop 3'),
(26, 6, 'Printer 1'),
(27, 6, 'Printer 2'),
(28, 7, 'Projector1'),
(29, 7, 'Projector 2'),
(30, 8, 'Other')

INSERT INTO Users(UserID, UserName, FirstName, LastName, RoleID, Department, User_Password, EmailID, Phone, UserAddress)
Values(1, 'keerthim', 'Saikeerthi', 'Madireddy', 1, 'Computer Science', 'abcd', 'student1@gmail.com', '405-123-4567', 'Address Street 74074'),
(2, 'deepthim', 'Deepthi', 'Mikkilineni', 1, 'Computer Science', 'abcd', 'student3@gmail.com', '405-123-4567', 'Address Street 74074'),
(3, 'Dominiquez', 'Dominique', 'Zachery', 1, 'Computer Science', 'abcd', 'student2@gmail.com', '405-123-4567', 'Address Street 74074'),
(4, 'admin', 'admin', 'admin', 2, 'Computer Science', 'abcd', 'admin@gmail.com', '405-123-4567', 'Address Street 74074')


Insert Into UserHistory(ID, UserID, ProductId, CheckedIn, CheckedOut, DueDate)
Values(1, 1, 22, '9/11/2021', '9/11/2021', '9/20/2021'),
(2, 1, 2, '9/11/2021', '9/11/2021', '9/20/2021'),
(3, 1, 3, '9/11/2021', '9/11/2021', '9/20/2021'),
(4, 2, 4, '9/11/2021', '9/11/2021', '9/20/2021'),
(5, 2, 5, '9/11/2021', '9/11/2021', '9/20/2021'),
(6, 2, 6, '9/11/2021', '9/11/2021', '9/20/2021'),
(7, 3, 7, '9/11/2021', '9/11/2021', '9/20/2021'),
(8, 3, 8, '9/11/2021', '9/11/2021', '9/20/2021'),
(9, 3, 9, '9/11/2021', '9/11/2021', '9/20/2021')
