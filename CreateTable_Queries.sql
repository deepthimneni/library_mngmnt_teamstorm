--Create Database
IF EXISTS (SELECT * FROM sys.databases WHERE name = 'LibraryDatabase')
BEGIN
    DROP DATABASE LibraryDatabase;  
END;
CREATE DATABASE LibraryDatabase;
GO

--Creating Roles Table
CREATE TABLE Roles (
RoleID int PRIMARY KEY,
RoleName VARCHAR(50) NOT NULL
)

--Creating Product Type table
CREATE TABLE ProductType(
ProductTypeID int PRIMARY KEY,
ProductTypeName VARCHAR(50) NOT NULL
)

--Cretaing Product table
CREATE TABLE Product(
ProductID int PRIMARY KEY,
ProductTypeID int NOT NULL,
ProductName VARCHAR(50) NOT NULL,
FOREIGN KEY (ProductTypeID) REFERENCES ProductType(ProductTypeID)
)

--Cretaing users table
CREATE TABLE Users(
UserID int PRIMARY KEY,
UserName VARCHAR(50) NOT NULL,
FirstName VARCHAR(50) Not NULL,
LastName VARCHAR(50) NOT NULL,
RoleID int NOT NULL,
Department VARCHAR(50) NOT NULL,
User_Password VARCHAR(50) NOT NULL,
EmailID VARCHAR(50) NOT NULL UNIQUE,
Phone VARCHAR(50) NOT NULL,
UserAddress VARCHAR(50) NOT NULL,
FOREIGN KEY (RoleID) REFERENCES Roles(RoleID)
)

--Creating Userhistory table
CREATE TABLE UserHistory(
ID int PRIMARY KEY NOT NULL,
UserID int NOT NULL,
ProductID int NOT NULL,
CheckedIN DATETIME,
CheckedOut DATETIME,
DueDate DATETIME,
LateFee int,
FOREIGN KEY (USerID) REFERENCES Users(UserID),
FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
)