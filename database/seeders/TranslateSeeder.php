<?php

namespace Database\Seeders;

use App\Models\Translate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $translates = [[
            'key' => 'ar',
            'word' => 'Login to Your Account',
            'translation' => 'سجل الدخول الى حسابك',
        ],[
            'key' => 'ar',
            'word' => 'Enter your username & password to login',
            'translation' => 'ادخل اسم المستخدم و كلمة المرور لتسجيل الدخول',
        ],[
            'key' => 'ar',
            'word' => 'Username / Email',
            'translation' => 'اسم المستخدم / البريد الالكتروني',
        ],[
            'key' => 'ar',
            'word' => 'Password',
            'translation' => 'كلمة المرور',
        ],[
            'key' => 'ar',
            'word' => 'Login',
            'translation' => 'تسجيل الدخول',
        ],[
            'key' => 'ar',
            'word' => 'Language',
            'translation' => 'اللغة',
        ],[
            'key' => 'ar',
            'word' => 'Dashboard',
            'translation' => 'لوحة التحكم',
        ],[
            'key' => 'ar',
            'word' => 'Users',
            'translation' => 'المستخدمين',
        ],[
            'key' => 'ar',
            'word' => 'Roles',
            'translation' => 'الادوار',
        ],[
            'key' => 'ar',
            'word' => 'Translation',
            'translation' => 'الترجمة',
        ],[
            'key' => 'ar',
            'word' => 'Settings',
            'translation' => 'الاعدادات',
        ],[
            'key' => 'ar',
            'word' => 'Profile',
            'translation' => 'الملف الشخصي',
        ],[
            'key' => 'ar',
            'word' => 'Update Profile',
            'translation' => 'تعديل الملف الشخصي',
        ],[
            'key' => 'ar',
            'word' => 'Name',
            'translation' => 'الاسم',
        ],[
            'key' => 'ar',
            'word' => 'Enter Name',
            'translation' => 'ادخل الاسم',
        ],[
            'key' => 'ar',
            'word' => 'Enter Password',
            'translation' => 'ادخل كلمة المرور',
        ],[
            'key' => 'ar',
            'word' => 'Confirm Password',
            'translation' => 'تأكيد كلمة المرور',
        ],[
            'key' => 'ar',
            'word' => 'Enter Confirm Password',
            'translation' => 'ادخل تأكيد كلمة المرور',
        ],[
            'key' => 'ar',
            'word' => 'Save',
            'translation' => 'حفظ',
        ],[
            'key' => 'ar',
            'word' => 'Back',
            'translation' => 'رجوع',
        ],[
            'key' => 'ar',
            'word' => 'Upload avatar here',
            'translation' => 'ارفع الصورة هنا',
        ],[
            'key' => 'ar',
            'word' => 'Image is preferred to be 300x300',
            'translation' => 'من المفضل ان تكون ابعاد الصورة 300*300',
        ],[
            'key' => 'ar',
            'word' => 'Leave it empty if you do not want to change password',
            'translation' => 'اترك هذا الحقل خالي اذا كنت لا ترغب بتغيير كلمة المرور',
        ],[
            'key' => 'ar',
            'word' => 'My Profile',
            'translation' => 'الملف الشخصي',
        ],[
            'key' => 'ar',
            'word' => 'Sign Out',
            'translation' => 'تسجيل خروج',
        ],[
            'key' => 'ar',
            'word' => 'Create New',
            'translation' => 'انشاء جديد',
        ],[
            'key' => 'ar',
            'word' => 'Image',
            'translation' => 'الصورة',
        ],[
            'key' => 'ar',
            'word' => 'Email',
            'translation' => 'البريد الالكتروني',
        ],[
            'key' => 'ar',
            'word' => 'Role',
            'translation' => 'الدور',
        ],[
            'key' => 'ar',
            'word' => 'Actions',
            'translation' => 'الاختيارات',
        ],[
            'key' => 'ar',
            'word' => 'Create User',
            'translation' => 'اضافة مستخدم',
        ],[
            'key' => 'ar',
            'word' => 'Enter Email',
            'translation' => 'ادخل البريد الالكتروني',
        ],[
            'key' => 'ar',
            'word' => 'Select Role',
            'translation' => 'اختر الدور',
        ],[
            'key' => 'ar',
            'word' => 'Update User',
            'translation' => 'تعديل مستخدم',
        ],[
            'key' => 'ar',
            'word' => 'Show User',
            'translation' => 'اظهار بيانات المستخدم',
        ],[
            'key' => 'ar',
            'word' => 'Create Role',
            'translation' => 'اضافة دور',
        ],[
            'key' => 'ar',
            'word' => 'Role Name',
            'translation' => 'اسم الدور',
        ],[
            'key' => 'ar',
            'word' => 'Enter Role Name',
            'translation' => 'ادخل اسم الدور',
        ],[
            'key' => 'ar',
            'word' => 'Update Role',
            'translation' => 'تعديل دور',
        ],[
            'key' => 'ar',
            'word' => 'Permissions',
            'translation' => 'الصلاحيات',
        ],[
            'key' => 'ar',
            'word' => 'Select All',
            'translation' => 'تحديد الكل',
        ],[
            'key' => 'ar',
            'word' => 'Deselect All',
            'translation' => 'الغاء تحديد الكل',
        ],[
            'key' => 'ar',
            'word' => 'Word',
            'translation' => 'الكلمة',
        ],[
            'key' => 'ar',
            'word' => 'Update Settings',
            'translation' => 'تعديل الاعدادات',
        ],[
            'key' => 'ar',
            'word' => 'Copyrights',
            'translation' => 'حقوق النشر',
        ],[
            'key' => 'ar',
            'word' => 'Copyrights text english',
            'translation' => 'نص حقوق النشر بالانجليزية',
        ],[
            'key' => 'ar',
            'word' => 'Enter text',
            'translation' => 'ادخل النص',
        ],[
            'key' => 'ar',
            'word' => 'Copyrights text arabic',
            'translation' => 'نص حقوق النشر بالعربية',
        ],[
            'key' => 'ar',
            'word' => 'Copyrights link text english',
            'translation' => 'نص رابط حقوق النشر بالانجليزية',
        ],[
            'key' => 'ar',
            'word' => 'Copyrights link text arabic',
            'translation' => 'نص رابط حقوق النشر بالعربية',
        ],[
            'key' => 'ar',
            'word' => 'Copyrights hyper link',
            'translation' => 'رابط حقوق النشر',
        ],[
            'key' => 'ar',
            'word' => 'Enter hyper link',
            'translation' => 'ادخل الرابط',
        ],[
            'key' => 'ar',
            'word' => 'Logo and Favicon',
            'translation' => 'اللوجو و ايقونة المفضلة',
        ],[
            'key' => 'ar',
            'word' => 'Upload logo here',
            'translation' => 'رفع اللوجو هنا',
        ],[
            'key' => 'ar',
            'word' => 'Logo is preferred to be 150x94',
            'translation' => 'من المفضل ان يكون ابعاد اللوجو 150*94',
        ],[
            'key' => 'ar',
            'word' => 'Reset',
            'translation' => 'إعادة ضبط',
        ],[
            'key' => 'ar',
            'word' => 'Upload favicon here',
            'translation' => 'رفع ايقونة المفضلة هنا',
        ],[
            'key' => 'ar',
            'word' => 'Favicon is preferred to be 32x32',
            'translation' => 'من المفضل ان يكون ابعاد ايقونة المفضلة 32*32',
        ],[
            'key' => 'ar',
            'word' => 'Contact us settings',
            'translation' => 'اعدادات اتصل بنا',
        ],[
            'key' => 'ar',
            'word' => 'Contact us to email',
            'translation' => 'البريد الالكتروني لاتصل بنا',
        ],[
            'key' => 'ar',
            'word' => 'Enter contact us to email',
            'translation' => 'ادخل البريد الالكتروني لاتصل بنا',
        ],[
            'key' => 'ar',
            'word' => 'Contact us email subject',
            'translation' => 'عنوان البريد الالكتروني لاتصل بنا',
        ],[
            'key' => 'ar',
            'word' => 'Enter Contact us email subject',
            'translation' => 'ادخل عنوان البريد الالكتروني لاتصل بنا',
        ]];

        foreach($translates as $translate){
            Translate::create($translate);
        }
    }
}
