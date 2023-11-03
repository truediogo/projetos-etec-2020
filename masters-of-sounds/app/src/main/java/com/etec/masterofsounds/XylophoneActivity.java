package com.etec.masterofsounds;

import androidx.appcompat.app.AppCompatActivity;

import android.media.AudioAttributes;
import android.media.AudioManager;
import android.media.SoundPool;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.util.SparseIntArray;
import android.view.View;
import android.widget.Toast;

public class XylophoneActivity extends AppCompatActivity {

    private SoundPool mSoundPool;
    private SparseIntArray mSoundMap;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_xylophone);


        AudioAttributes audioAttributes = new AudioAttributes.Builder()
                .setContentType(AudioAttributes.CONTENT_TYPE_MUSIC)
                .setUsage(AudioAttributes.USAGE_GAME)
                .build();

        mSoundPool = new SoundPool.Builder()
                .setAudioAttributes(audioAttributes)
                .setMaxStreams(1)
                .build();


        //TODO: Inicializar Mapa de Sons
        mSoundMap = new SparseIntArray();
        try {
            mSoundMap.put(R.id.botaoVermelho, mSoundPool.load(getApplicationContext(), R.raw.note1, 1));
            mSoundMap.put(R.id.botaoLaranja, mSoundPool.load(getApplicationContext(), R.raw.note2, 1));
            mSoundMap.put(R.id.botaoAmarelo, mSoundPool.load(getApplicationContext(), R.raw.note3, 1));
            mSoundMap.put(R.id.botaoVerde, mSoundPool.load(getApplicationContext(), R.raw.note4, 1));
            mSoundMap.put(R.id.botaoVerdeOutro, mSoundPool.load(getApplicationContext(), R.raw.note5, 1));
            mSoundMap.put(R.id.botaoAzul, mSoundPool.load(getApplicationContext(), R.raw.note6, 1));
            mSoundMap.put(R.id.botaoPurpura, mSoundPool.load(getApplicationContext(), R.raw.note7, 1));

        } catch (Exception e) {
            Log.e("XylophoneActivity", "Error: " + e.getLocalizedMessage());
        }

    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        mSoundPool.release();
        mSoundPool = null;
    }

    //TODO: Criar funções que capturem o click dos botões
    public void botaoClick(View view) {

        //TODO: Reproduzir Sons
        int idSom = mSoundMap.get(view.getId());
        mSoundPool.play(idSom, 1.0F, 1.0F, 1, 0, 1.0F);
    }
}
