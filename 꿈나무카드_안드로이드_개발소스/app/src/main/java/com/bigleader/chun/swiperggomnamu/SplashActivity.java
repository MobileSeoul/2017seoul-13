package com.bigleader.chun.swiperggomnamu;

/**
 * Created by chun on 2017. 9. 17..
 */

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;

/**
 * Created by yujin on 2017. 4. 5..
 */

public class SplashActivity extends AppCompatActivity {



    private static final int REQUEST_CODE_PERMISSION = 1;
    String mPermission = Manifest.permission.ACCESS_FINE_LOCATION;




    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {








        super.onCreate(savedInstanceState);

        Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);


        if(Build.VERSION.SDK_INT>= 23) {
            if (checkSelfPermission(mPermission) != PackageManager.PERMISSION_GRANTED) {
                ActivityCompat.requestPermissions(SplashActivity.this,
                        new String[]{mPermission,
                        },
                        REQUEST_CODE_PERMISSION);
                return;
            }
            else {
                return;
            }
        }


        finish();



    }




}