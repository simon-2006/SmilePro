-- Stored procedure: sp_GetAllUsersRoles
DROP PROCEDURE IF EXISTS sp_GetAllUsersRoles;
CREATE PROCEDURE sp_GetAllUsersRoles()
BEGIN
    SELECT DISTINCT rolename
    FROM users;
END;