# Challenge-Excited-App

## 設計書

https://docs.google.com/spreadsheets/d/1VFd2y1Y8dnjgAvS_c9fTA69DEW1dZkMF2lo1asfQVk4/edit?usp=sharing

## プレゼンテーション

https://docs.google.com/presentation/d/1_IQEJ7LBx1BsK9_iUJJpFHyhpw48szx8tvW2LWx-CaM/edit#slide=id.p

## 環境構築

* Clone & Sail Up

```
$ git clone git@github.com:kbanchi-spartacamp/challenge-excited-app.git
$ cd challenge-excited-app
$ git switch develop
$ docker run --rm \
  -v $(pwd):/opt \
  -w /opt \
  laravelsail/php80-composer:latest \
  bash -c "composer install"
$ cp .env.example .env
$ sail up -d
$ sail artisan key:generate
$ sail artisan migrate:fresh --seed
```

* GCPのcredential

credential.jsonをchallenge-excited-app/配下に配置してください
