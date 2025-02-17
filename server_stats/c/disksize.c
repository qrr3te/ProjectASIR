#include <stdint.h>
#include <sys/statfs.h>

typedef struct {
   int32_t total_size;
   int32_t aval_size;
} Disksize;

Disksize get_disksize() {
   struct statfs stats;
   statfs("/", &stats);

   Disksize disksize;
   disksize.total_size = (int) (stats.f_bsize * stats.f_blocks / 1024 / 1024 / 1024);
   disksize.aval_size = (int) (stats.f_bsize * stats.f_bavail / 1024 / 1024 / 1024);

   return disksize;
}
