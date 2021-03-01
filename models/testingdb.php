<?php

require_once 'DataBase.php';

$db = new DataBase('localhost', "root", 'root', 'localdb');
$db->dbConnect();


$crateFloors = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS Floors (
    FloorID INT (1) AUTO_INCREMENT NOT NULL,
    CountOfRooms INT (1) NOT NULL,
    PRIMARY KEY (FloorID)
    )');


$crateTypesOfRooms = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS TypesOfRooms (
    TypeID INT (2) AUTO_INCREMENT PRIMARY KEY ,
    NameOfType VARCHAR (20) NOT NULL,
    MinNumberOfBerths INT (1) NOT NULL ,
    MaxNumberOfBerths INT (1) NOT NULL ,
    Cost INT (6) NOT NULL ,
    FloorID INT (1) NOT NULL,
    FOREIGN KEY (FloorID) REFERENCES Floors(FloorID)
    )');

$crateRooms = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS Rooms (
    RoomID INT (2) AUTO_INCREMENT PRIMARY KEY ,
    NumberOfRoom INT (3) NOT NULL ,
    TypeID INT (2),
    FOREIGN KEY (TypeID) REFERENCES TypesOfRooms(TypeID)
    )');


$crateGender = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS Genders (
    GenderID INT (1) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    GenderType VARCHAR (20)    NOT NULL
    )');


$crateUsers = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS Users (
    UserID              INT (10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    UserName            VARCHAR (20)    NOT NULL ,
    UserLastName        VARCHAR (20)    NOT NULL ,
    UserDateOfBirth     INT (11)        NOT NULL ,
    UserTelephone       INT (11)        NOT NULL ,
    UserEMail           VARCHAR (20)    NOT NULL ,
    UserGender          INT (1)         NOT NULL ,
    UserDateRegistration INT (11)   NOT NULL ,
    UserNotes           VARCHAR (255)    ,
    FOREIGN KEY (UserGender) REFERENCES Genders(GenderID)
    )');


$crateStatuses = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS Statuses (
    StatusID            INT (1) AUTO_INCREMENT PRIMARY KEY ,
    StatusType          VARCHAR (20)    NOT NULL,
    StatusDescription   VARCHAR (20)    NOT NULL
    )');


$crateOrders = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS Orders (
    OrderID         INT (10) AUTO_INCREMENT PRIMARY KEY ,
    UserID          INT (10) NOT NULL,
    NumberOfBerths  INT (2) NOT NULL,
    OrderNotes      VARCHAR (255),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
    )');

$crateOrdersHistory = $db->dbSqlCreate('CREATE TABLE IF NOT EXISTS OrdersHistory (
    OrderListID     INT (10) AUTO_INCREMENT PRIMARY KEY ,
    OrderID         INT (10) NOT NULL,
    RoomID          INT (2) NOT NULL,
    BookingDate     INT (11) NOT NULL ,
    ArrivalDate     INT (11) NOT NULL ,
    DateOfDeparture INT (11) NOT NULL ,
    StatusID        INT (2) NOT NULL,
    FOREIGN KEY (StatusID) REFERENCES Statuses(StatusID),
    FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID)
    )');


date_default_timezone_set('Europe/Kiev');
echo date('H:i:s');

//$result = $db->dbSqlCreate("INSERT INTO Floors (CountOfRooms) VALUES ('6')");
//$result = $db->dbSqlCreate("INSERT INTO Floors (CountOfRooms) VALUES ('6')");
//$result = $db->dbSqlCreate("INSERT INTO Floors (CountOfRooms) VALUES ('3')");


//$result = $db->dbSqlCreate("INSERT INTO TypesOfRooms (NameOfType, MinNumberOfBerths, MaxNumberOfBerths, Cost, FloorID)
//                                        VALUES ('LowCost', '1', '2','1000', '1')");
//$result = $db->dbSqlCreate("INSERT INTO TypesOfRooms (NameOfType, MinNumberOfBerths, MaxNumberOfBerths, Cost, FloorID)
//                                        VALUES ('LowCost+', '3', '4','1500', '1')");
//$result = $db->dbSqlCreate("INSERT INTO TypesOfRooms (NameOfType, MinNumberOfBerths, MaxNumberOfBerths, Cost, FloorID)
//                                        VALUES ('Medium', '1', '2','2000', '2')");
//$result = $db->dbSqlCreate("INSERT INTO TypesOfRooms (NameOfType, MinNumberOfBerths, MaxNumberOfBerths, Cost, FloorID)
//                                        VALUES ('Medium+', '3', '4','3000', '2')");
//$result = $db->dbSqlCreate("INSERT INTO TypesOfRooms (NameOfType, MinNumberOfBerths, MaxNumberOfBerths, Cost, FloorID)
//                                        VALUES ('Vip', '1', '3','5000', '3')");


//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('101', '1')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('102', '1')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('103', '1')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('104', '1')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('105', '2')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('106', '2')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('201', '3')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('202', '3')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('203', '3')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('204', '3')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('205', '4')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('206', '4')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('301', '5')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('302', '5')");
//$result = $db->dbSqlCreate("INSERT INTO Rooms (NumberOfRoom, TypeID) VALUES ('303', '5')");



//$result = $db->dbSqlCreate("INSERT INTO Genders (GenderType) VALUES ('Man')");
//$result = $db->dbSqlCreate("INSERT INTO Genders (GenderType) VALUES ('Woomen')");

//
//$result = $db->dbSqlCreate("INSERT INTO Users (UserName, UserLastName, UserDateOfBirth, UserTelephone, UserEMail, UserGender, UserNotes)
//                                                    VALUES ('Ivan', 'Vasilievich', '45646516', '165651561', 'dgdfgd@sdfsdf', '1', 'Не любит сахар')");


$array = $db->dbSqlPrepare("
SELECT * FROM OrdersHistory 
    Left JOIN Rooms 
    ON OrdersHistory.RoomID=Rooms.RoomID 
    LEFT JOIN typesofrooms
    ON Rooms.TypeID=typesofrooms.TypeID ");

echo "<pre>";
var_dump($array);
