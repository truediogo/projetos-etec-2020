package com.etec.xylophone;

import androidx.appcompat.app.AppCompatActivity;

import android.media.SoundPool;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Button btnRed = findViewById(R.id.btnRed);
        Button btnOrange = findViewById(R.id.btnOrange);
        Button btnYellow = findViewById(R.id.btnYellow);
        Button btnGreen = findViewById(R.id.btnGreen);
        Button btnDarkGreen = findViewById(R.id.btnDarkGreen);
        Button btnBlue = findViewById(R.id.btnBlue);
        Button btnPurple = findViewById(R.id.btnPurple);

        final SoundPool soundPool = new SoundPool.Builder()
                .setMaxStreams(7)
                .build();

        final int redSound = soundPool.load(this, R.raw.note1, 1);
        final int orangeSound = soundPool.load(this, R.raw.note2, 1);
        final int yellowSound = soundPool.load(this, R.raw.note3, 1);
        final int greenSound = soundPool.load(this, R.raw.note4, 1);
        final int darkGreenSound = soundPool.load(this, R.raw.note5, 1);
        final int blueSound = soundPool.load(this, R.raw.note6, 1);
        final int purpleSound = soundPool.load(this, R.raw.note7, 1);

        btnRed.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                soundPool.play(redSound, 1,1,1,0,1);
            }
        });

        btnOrange.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                soundPool.play(orangeSound, 1, 1, 1,0,1);
            }
        });

        btnYellow.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                soundPool.play(yellowSound, 1,1,1,0,1);
            }
        });

        btnGreen.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                soundPool.play(greenSound, 1,1,1,0,1);
            }
        });

        btnDarkGreen.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                soundPool.play(darkGreenSound, 1,1,1,0,1);
            }
        });

        btnBlue.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                soundPool.play(blueSound, 1,1,1,0,1);
            }
        });

        btnPurple.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                soundPool.play(purpleSound, 1,1,1,0,1);
            }
        });

    }

}