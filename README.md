## MySQL

* 建立 users、messages 兩張表，以下分別為欄位內容：

### users
| 欄位名稱 | 型態 | 長度 |
| ------- | --- | ---- |
| id | INT | 11 |
| name | VARCHAR | 255 |
| account | VARCHAR | 255 |
| password | VARCHAR | 255 |

### messages
| 欄位名稱 | 型態 | 長度 |
| ------- | --- | ---- |
| id | INT | 11 |
| user_id | INT | 11 |
| content | TEXT |  |
| created_at | DATETIME |  |