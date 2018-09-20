<template>
  <aside :class="['Sidebar', sidebarOpen ? ' is-open' : '']" v-if="user">
    <section class="Sidebar__widget" v-show="sidebarOpen">
      <p>You have been assigned a new task <a href="#">QUT223</a></p>
    </section>
    <footer class="Sidebar__footer">
      <ul class="Sidebar__footer-settings" v-show="settingsOpen">
        <li class="Sidebar__footer-settings-item">
          <button class="Sidebar__footer-settings-link" aria-label="Edit Profile" @click="logout">Edit Profile</button>
        </li>
        <li class="Sidebar__footer-settings-item">
          <button class="Sidebar__footer-settings-link" aria-label="Sign Out" @click="logout">Sign out</button>
        </li>
      </ul>
      <section class="Sidebar__footer-controls">
        <button class="Sidebar__footer-control-item" @click="toggleSettings">
          <vue-icon name="fa solid cog" fill="delta" />
        </button>
        <button class="Sidebar__footer-control-item" @click="toggleSidebar">
          <vue-icon v-if="sidebarOpen" name="fa solid arrow-left" fill="delta" />
          <vue-icon v-else name="fa solid arrow-right" fill="delta" />
        </button>
      </section>
    </footer>
  </aside>
</template>
<script>
export default {
  props: ['user'],
  data() {
    return {
      sidebarOpen: true,
      settingsOpen: false,
    };
  },
  methods: {
    toggleSettings() {
      this.settingsOpen = !this.settingsOpen;
    },
    toggleSidebar() {
      this.sidebarOpen = !this.sidebarOpen;
    },
    logout() {
      return axios
        .post('/auth/logout')
        .then((data) => {
          return this.redirect('/');
        })
        .catch(console.error);
    }
  },
};
</script>
