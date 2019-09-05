REST API 
POST /api/auth/register -  Регистрация пользователя (Имя, Email, Пароль, Повтор пароля)
POST /api/auth/login -  Полкчение токена доступа пользователя (Email, Пароль)
POST /api/auth/logout

GET /api/checklists/ 
GET /api/checklists/{id}
UPDATE /api/checklists/{id}
DELETE /api/checklists/{id}
PUT /api/checklists/{id}

GET /api/checklists/{id}/listitems 
GET /api/checklists/{id}/listitems/{id}
UPDATE /api/checklists/{id}/listitems/{id}
DELETE /api/checklists/{id}/listitems/{id}
PUT /api/checklists/{id}/listitems/{id}

АДМИН ПАНЕЛЬ 
/admin
