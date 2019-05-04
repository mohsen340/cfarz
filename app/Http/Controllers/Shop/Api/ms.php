<?php

namespace App\Http\Controllers\Shop\Api;


class ms {
  //register
  const REGISTER_NAME_ERROR = 'لطفا نام خود را به درستی وارد کنید';
  const REGISTER_EMAIL_ERROR = 'این ایمیل در سیستم وجود دارد';
  const REGISTER_PASSWORD_ERROR = 'لطفا کلمه عبور بهتری وارد کنید';
  const REGISTER_SUCCESS = 'حساب با موفقیت ایجاد شد';

  //login
  const LOGIN_FAIL_ERROR = 'ورود به حساب کاربری انجام نشد.لطفا ایمیل و رمز عبور خود را با دقت وارد کنید';
  const LOGIN_SUCCESS = 'با موفقیت وارد شدید';
  const LOGIN_RETRY = 'شما قبلا وارد حساب کاربری شده اید';
  const MUST_BE_LOGIN = 'لطفا وارد حساب کاربری خود شوید';

  //logout
  const LOGOUT_SUCCESS = 'با موفقیت از حساب کاربری خارج شدید';

  //server error
  const INTERNAL_SERVER_ERROR = 'مشکلی در سرور به وجود آمده است لطفا دوباره امتحان کنید';

  //data  messages
  const INVALID_DATA = 'اطلاعات ارسال شده صحیح نمی باشند لطفا ورودی ها را بررسی کنید';
  const NOT_FOUND_OBJECT = 'اطلاعات مورد نظر یافت نشد';
  const EXIST_OBJECT = 'اطلاعات مورد نظر قبلا ثبت شده است';
  const APP_KEY_ERROR = 'کلید ارسالی اشتباه است';

  const PAYMENT_SUCCESS = 'پرداخت با موفقیت انجام شد';
  const PAYMENT_FAILED = 'پرداخت ناموفق بود.لطفا دوباره امتحان کنید';

  const NOT_EXIST_PRRODUCT = 'متاسفانه این محصول موجود نمی باشد';

}