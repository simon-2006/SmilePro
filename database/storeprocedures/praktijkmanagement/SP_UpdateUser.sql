USE Breezedemo; 

DROP PROCEDURE IF EXISTS sp_UpdateUser;

DELIMITER $$

CREATE PROCEDURE sp_UpdateUser(
    IN p_Id INT,
    ,IN p_Name VARCHAR(50)
    ,IN p_Email VARCHAR(100)
    ,IN p_Rolename VARCHAR(50)
)

BEGIN

    UPDATE users AS USRS
    SET USRS.name = p_Name,
        USRS.email = p_Email,
        USRS.rolename = p_Rolename
    WHERE USRS.Id = p_Id;
        
END $$

DELIMITER ;