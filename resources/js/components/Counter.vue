<template>
    <div class="counter">
      <button @click="decrement">−</button>
      <span>{{ count }}</span>
      <button @click="increment">＋</button>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  // 初期値を1に設定
const count = ref(1);

// 数値を増加
const increment = () => {
  count.value++;
};

// 数値を減少（1より下にはならない）
const decrement = () => {
  if (count.value > 1) {
    count.value--;
  }
};
  </script>

  <style scoped>
  .counter {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    gap: 10px;
    border: solid 1px #D4D2CB;
    width: 140px;
    margin-bottom: 25px;
  }

  button {
    padding: 5px 10px;
    font-size: 18px;
    cursor: pointer;
  }

  span {
    min-width: 30px;
    text-align: center;
    font-size: 16px;
  }
  </style>
