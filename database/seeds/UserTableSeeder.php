<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Manager;
use App\Coordinator;
use Illuminate\Support\Facades\Hash;
use App\Record;
use App\Student;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user=User::create([
        'name'=>'Admin',
        'email'=>'admin@gmail.com',
        'password'=>Hash::make('12345678'),

      ]);
      $user->assignRole('superadmin');
      //  $manager=['name'=>'Marketing Manager',
       //    'email'=>'manager1@gmail.com',
       //    'password'=>'123456789',
       //    'nrc'=>'9/AMZ(N)098766',
       //    'phone'=>'09-8765433',
       //    'address'=>'Hlaing,MyaNaDa Street',
       //    'education'=>'M.SC(Business)'
       //   ];

       // $manager2= User::create([
       //   'name'=>$manager['name'],
       //   'email'=>$manager['email'],
       //   'password'=>Hash::make($manager['password'])
       //  ]);  
       //  $manager=['name'=>'Marketing Manager',
       //  	 'email'=>'manager1@gmail.com',
       //  	 'password'=>'123456789',
       //  	 'nrc'=>'9/AMZ(N)098766',
       //  	 'phone'=>'09-8765433',
       //  	 'address'=>'Hlaing,MyaNaDa Street',
       //  	 'education'=>'M.SC(Business)'
       //  	];

       // $manager2= User::create([
       //  	'name'=>$manager['name'],
       //  	'email'=>$manager['email'],
       //  	'password'=>Hash::make($manager['password'])
       //  ]);	

       // Manager::create([
       // 	'user_id'=>$manager2->id,
       // 	'phone'=>$manager['phone'],
       // 	'nrc'=>$manager['nrc'],
       // 	'address'=>$manager['address'],
       // 	'education'=>$manager['education']
       // ]);
       // $manager2->assignRole('manager');



    	// $coordinator=['name'=>'Business coordinator',
     //    	 'email'=>'bcoordinator777@gmail.com',
     //    	 'password'=>'123456789',
     //    	 'nrc'=>'9/MYK(N)090796',
     //    	 'phone'=>'09-8765453',
     //    	 'address'=>'Hlaing,ThanZin Street',
     //    	 'education'=>'B.SC(Business)',
     //    	 'faculty_id'=>1
     //    	];
     //    	//dd($coordinator);

     //   $coordinator= User::create([
     //    	'name'=>$coordinator['name'],
     //    	'email'=>$coordinator['email'],
     //    	'password'=>Hash::make($coordinator['password'])
     //    ]);	
        // protected $fillable=['user_id','faculty_id','photo','nrc','education','phone','address'];

      //  Coordinator::create([
      //  	'user_id'=>$coordinator->id,
      //  	'faculty_id'=>1,
      //  	'phone'=>$coordinator['phone'],
      //  	'nrc'=>$coordinator['nrc'],
      //  	'education'=>$coordinator['education'],
      //  	'address'=>$coordinator['address']
      //  ]);
      //  $coordinator->assignRole('coordinator');

      // $coordinator=['name'=>'Web coordinator',
      //      'email'=>'wcoordinator999@gmail.com',
      //      'password'=>'123456789',
      //      'nrc'=>'9/MYK(N)099634',
      //      'phone'=>'09-79876343',
      //      'address'=>'Wireless,Myattar Street',
      //      'education'=>'B.SC(Business)',
      //      'faculty_id'=>2
      //     ];
          //dd($coordinator);

       // // $coordinator= User::create([
       // //    'name'=>$coordinator['name'],
       // //    'email'=>$coordinator['email'],
       // //    'password'=>Hash::make($coordinator['password'])
       // //  ]); 
       //  // protected $fillable=['user_id','faculty_id','photo','nrc','education','phone','address'];

       // Coordinator::create([
       //  'user_id'=>$coordinator->id,
       //  'faculty_id'=>2,
       //  'phone'=>$coordinator['phone'],
       //  'nrc'=>$coordinator['nrc'],
       //  'education'=>$coordinator['education'],
       //  'address'=>$coordinator['address']
       // ]);
       // $coordinator->assignRole('coordinator');

      // $student=['name'=>'student1',
      //      'email'=>'student123@gmail.com',
      //      'password'=>'123456789',
      //      'nrc'=>'9/MYK(N)999876',
      //      'phone'=>'09-8766663',
      //      'address'=>'InSein,10th Street',
      //      'father'=>'U Hla',
      //      'mother'=>'Daw Mya',
      //      'faculty_id'=>1
      //     ];
          //dd($coordinator);
  // protected $fillable=['user_id','nrc','fatherName','motherName','phone','address'];
       // $user1= User::create([
       //    'name'=>$student['name'],
       //    'email'=>$student['email'],
       //    'password'=>Hash::make($student['password'])
       //  ]); 
        

       // $student=Student::create([
       //  'user_id'=>$user1->id,
       //  'nrc'=>$student['nrc'],
       //  'FatherName'=>$student['father'],
       //  'motherName'=>$student['mother'],
       //  'phone'=>$student['phone'],
       //  'address'=>$student['address']
       // ]);

       // Record::create([
       //  'student_id'=>$student->id,
       //  'classroom_id'=>1,
       //  'academic_id'=>4,
       //  'rollno'=>2
       // ]);
       // $user1->assignRole('student');
        
    }
}
