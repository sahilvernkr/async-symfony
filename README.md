# async-symfony

Ref : https://www.youtube.com/watch?v=s_foKPUz62w&list=PLQH1-k79HB39ZGddNOgbaU6Oamgcw7hBF&index=2

For testing of mails
- docker-compose up -d
- symfony serve -d
- symfony open:local:webmail
- http://127.0.0.1:8000/buy
- docker ps (to know the port)
- symfony console messenger:consume async -vv
- symfony console messenger:failed:show
- symfony console messenger:failed:show 22 --transport=failed -vv
you can retry or delete message on the failure transport