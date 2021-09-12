--Query to get user history records with product type and product names that user checked in
Select  UH.*, U.UserName, P.ProductName, PT.ProductTypeName
From Users as U
Join UserHistory as UH
on U.UserID = UH.UserID
join Product as P
on UH.ProductID = P.ProductID
JOin ProductType as PT
on P.ProductTypeID = PT.ProductTYpeID
Where U.UserID = 1

--Query to get the user information with the role as Admin 
Select U.UserName, R.RoleName
From Users as U
Join Roles as R
ON U.RoleID = R.RoleID

--Query to get the count of product types that are checkedin by any users
SELECT COUNT(ProductID) as NumberOfProducts, ProductTypeName
FROM Product as P
JOIN ProductType as PT
ON P.ProductTypeID = PT.ProductTypeID
GROUP BY PT.ProductTYpeName

-- Query to get the product that are due by yesterday
SELECT UH.DueDate, U.FirstName, P.ProductID
FROM Product as P
JOIN UserHistory as UH
ON UH.ProductID = P.ProductID
JOIN Users as U
ON U.UserID = UH.UserID
WHere UH.DueDate < GetDate()

--Updating USerHistory Table by adding Latefee column
ALTER TABLE USerHistory
ADD LateFee int;

--Updating Late of $5 to the users whose Duedate is crossed
Update UserHistory
Set LateFee = 5
Where DueDate < GETDATE()

Update USerHIstory
Set USerID = 2
Where USeriD = 1

--Deleting the records that are checkedin
Delete FROM UserHistory
Where CheckedIN < GetDate()

--Get the Latefee by user
SELECT SUM(UH.LAtefee) as Latefee, U.USerName
FROM Users as U
JOIN UserHistory as UH
ON U.UserID = UH.UserID
Group By U.USerName