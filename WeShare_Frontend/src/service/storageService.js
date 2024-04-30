export const LocalStorageService = {
    // Function to set an item in localStorage
    setItem(key, value) {
      localStorage.setItem(key, JSON.stringify(value));
    },
  
    // Function to get an item from localStorage
    getItem(key) {
      const item = localStorage.getItem(key);
      return item ? JSON.parse(item) : null;
    },
  
    // Function to remove an item from localStorage
    removeItem(key) {
      localStorage.removeItem(key);
    },
  
    // Function to clear all items from localStorage
    clear() {
      localStorage.clear();
    }
  };
  